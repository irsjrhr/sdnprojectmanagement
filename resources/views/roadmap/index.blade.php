@extends('layouts.app')
@section('title', 'Project Roadmap')
@section('page_title', 'Project Roadmap')

@section('content')
<style>
    /* Frappe Gantt CSS */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.6.1/frappe-gantt.min.css');

    .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,.04); }
    .toolbar { display: flex; gap: 10px; margin-bottom: 20px; }
    .btn-zoom { padding: 8px 16px; background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 8px; cursor: pointer; transition: all 0.2s; font-weight: 500; color: #334155; }
    .btn-zoom:hover, .btn-zoom.active { background: #0891b2; color: #fff; border-color: #0891b2; }

    /* Customizing Frappe Gantt Bars for Arxino Aesthetics */
    .gantt .bar-project .bar { fill: #0891b2; } /* Primary Blue */
    .gantt .bar-project .bar-progress { fill: #164e63; }

    .gantt .bar-epic .bar { fill: #8b5cf6; } /* Purple */
    .gantt .bar-epic .bar-progress { fill: #4c1d95; }

    .gantt .bar-sprint .bar { fill: #f59e0b; }
    .gantt .bar-sprint .bar-progress { fill: #b45309; }
    .gantt .bar-task .bar { fill: #10b981; } /* Green */
    .gantt .bar-task .bar-progress { fill: #065f46; }

    .gantt .bar-dummy .bar { fill: #ef4444; } /* Red for dummy/error */

    /* Glassmorphism popup override */
    body .gantt-container .popup-wrapper {
        position: absolute;
        transition: opacity 0.2s; /* remove transform overrides so JS can position it */
        z-index: 9999;
    }
    body .gantt-container .popup-wrapper .pointer {
        display: none !important;
    }
    body .gantt-container .details-wrapper {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2) !important;
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        padding: 16px !important;
        color: #000 !important;
        min-width: 250px;
    }
    body .gantt-container .details-wrapper .arx-title { font-weight: 700; color: #000; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px; margin-bottom: 8px; font-size: 1.05rem; }
    body .gantt-container .details-wrapper .arx-subtitle { color: #000 !important; font-weight: 500; line-height: 1.5; }

    @cannot('update roadmap')
    .gantt .bar-wrapper { cursor: pointer !important; }
    .gantt .handle-group { display: none !important; }
    @endcannot

    /* Fix Frappe Gantt container to prevent overflow clipping */
    .gantt-container {
        overflow: auto !important;
        height: calc(100vh - 250px); /* Membatasi tinggi agar muncul scrollbar vertikal */
        min-height: 400px;
        padding-bottom: 100px;
        position: relative;
    }
    
    /* Sticky Header Classes */
    .gantt .sticky-header {
        transform: translateY(var(--scroll-y, 0px));
    }
    .gantt .grid-header {
        fill: #ffffff !important;
        stroke: #e2e8f0;
        stroke-width: 1;
    }
</style>

<div class="card">
    <div class="toolbar">
        <button class="btn-zoom" data-view="Quarter Day">Quarter Day</button>
        <button class="btn-zoom" data-view="Half Day">Half Day</button>
        <button class="btn-zoom" data-view="Day">Day</button>
        <button class="btn-zoom active" data-view="Week">Week</button>
        <button class="btn-zoom" data-view="Month">Month</button>
    </div>

    <div class="gantt-wrapper">
        <svg id="gantt"></svg>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.6.1/frappe-gantt.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tasks = {!! $ganttTasksJson !!};

        if(tasks.length === 0) return;

        const isReadonly = @json(!auth()->user()->can('update roadmap'));

        const gantt = new Gantt("#gantt", tasks, {
            readonly: isReadonly,
            view_modes: ['Quarter Day', 'Half Day', 'Day', 'Week', 'Month'],
            view_mode: 'Week',
            date_format: 'YYYY-MM-DD',
            custom_popup_html: function(task) {
                // Gunakan task._start dan task._end yang merupakan Date object aktual yang diupdate library
                const s = task._start.getFullYear() + '-' + String(task._start.getMonth() + 1).padStart(2, '0') + '-' + String(task._start.getDate()).padStart(2, '0');
                const e = task._end.getFullYear() + '-' + String(task._end.getMonth() + 1).padStart(2, '0') + '-' + String(task._end.getDate()).padStart(2, '0');
                // Force tooltip to snap to the left edge of the bar
                setTimeout(() => {
                    const popup = document.querySelector('.popup-wrapper');
                    const barGroup = document.querySelector(`.bar-wrapper[data-id="${task.id}"]`);
                    if (popup && barGroup) {
                        const bar = barGroup.querySelector('.bar');
                        if (bar) {
                            const container = document.querySelector('.gantt-container');
                            const barRect = bar.getBoundingClientRect();
                            const containerRect = container.getBoundingClientRect();
                            
                            let x = barRect.left - containerRect.left + container.scrollLeft;
                            let y = barRect.top - containerRect.top + container.scrollTop;
                            
                            // Titik asal ditempatkan sedikit di kiri bar, sejajar secara vertikal di tengah bar
                            popup.style.left = (x - 15) + 'px';
                            popup.style.top = (y + barRect.height / 2) + 'px';
                            // Gunakan transform agar browser menghitung offsetWidth dan offsetHeight secara otomatis
                            popup.style.transform = 'translate(-100%, -50%)';
                        }
                    }
                }, 10);
                
                return `
                    <div class="details-wrapper">
                        <div class="arx-title" style="color: #000 !important;">${task.name}</div>
                        <div class="arx-subtitle" style="color: #000 !important; font-weight: 500;">Start: ${s} <br> End: ${e}</div>
                        <div style="margin-top: 6px; font-size: 0.85rem; color: #000 !important; font-weight: 600;">Progress: ${task.progress}%</div>
                    </div>
                `;
            },
            on_date_change: function(task, start, end) {
                // Hindari masalah timezone dengan memformat langsung ke string YYYY-MM-DD
                const startStr = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2, '0') + '-' + String(start.getDate()).padStart(2, '0');
                const endStr = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2, '0') + '-' + String(end.getDate()).padStart(2, '0');

                // Send AJAX request to save changes
                fetch("{{ route('roadmap.updateDate') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        id: task.id,
                        start: startStr,
                        end: endStr
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 2000 });
                        Toast.fire({ icon: 'success', title: data.message });
                    } else {
                        Swal.fire('Error', data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error', 'Failed to update timeline', 'error');
                });
            }
        });

        // Zoom Controls
        const zoomBtns = document.querySelectorAll('.btn-zoom');
        zoomBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                zoomBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                gantt.change_view_mode(this.getAttribute('data-view'));
                setTimeout(fixGanttHeader, 100); // Re-apply sticky header after redraw
            });
        });

        // Sticky Header Logic
        const ganttContainer = document.querySelector('.gantt-container');
        ganttContainer.addEventListener('scroll', function() {
            this.style.setProperty('--scroll-y', this.scrollTop + 'px');
        });

        function fixGanttHeader() {
            const svg = document.querySelector('#gantt');
            if (!svg) return;
            
            let stickyGroup = svg.querySelector('.sticky-header');
            if (!stickyGroup) {
                stickyGroup = document.createElementNS("http://www.w3.org/2000/svg", "g");
                stickyGroup.classList.add('sticky-header');
                svg.appendChild(stickyGroup);
            }
            
            const gridHeader = svg.querySelector('.grid-header');
            const dateGroup = svg.querySelector('.date');
            
            if (gridHeader && gridHeader.parentNode !== stickyGroup) {
                stickyGroup.appendChild(gridHeader);
            }
            if (dateGroup && dateGroup.parentNode !== stickyGroup) {
                stickyGroup.appendChild(dateGroup);
            }
        }

        // Initial apply
        setTimeout(fixGanttHeader, 200);
    });
</script>
@endpush
@endsection
