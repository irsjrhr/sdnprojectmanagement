# Product Philosophy
This project is developed as a software product, not as a custom project.
Every implementation must prioritize:
- Reusability
- Maintainability
- Scalability
- Configurability

Features should be designed for multiple customers whenever possible.
Avoid customer-specific logic unless explicitly approved.

# Architecture Principles
The system follows a Modular Monolith Architecture.
Modules must remain loosely coupled.
Shared functionality should be implemented as reusable services rather than duplicated across modules.
Business logic must not be placed inside controllers or UI components.

# Development Priorities
Priority Order:
1. Business correctness
2. Data integrity
3. Security
4. Maintainability
5. Performance
6. Developer convenience

Never sacrifice data integrity for convenience.

# Product Independence
Do not assume any specific industry.
Design modules to support:
- Distribution
- Trading
- Manufacturing
- Import

Industry-specific behavior must be configurable.
Avoid hardcoded business rules.

# Configuration First
Whenever possible:
Configuration > Custom Code

Examples:
- Approval Flow
- Document Number Format
- Credit Limit Rules
- Inventory Policies
- Tax Rules

Customer variations should be solved through configuration.

# Shared Engine Strategy
Before creating new functionality, check whether it belongs to:
- Workflow Engine
- Approval Engine
- Reporting Engine
- Notification Engine
- Audit Engine
- Document Number Engine
- Configuration Engine

Avoid duplicate implementations.

# Database Principles
Database design must prioritize:
- Referential Integrity
- Auditability
- Historical Tracking

Never physically delete transactional data.
Use soft delete when applicable.
All transactions must be traceable.

# API Standards
All business functionality must be accessible through API.
Use:
- REST API
- OpenAPI Specification
- Consistent Response Format

Avoid exposing internal implementation details.

# Coding Standards
Controllers:
- Request handling only

Services:
- Business logic

Repositories:
- Data access

Events:
- Cross-module communication

Keep classes focused on a single responsibility.

# Documentation Requirement
Any significant feature must include:
- Business Rules
- Acceptance Criteria
- Database Impact
- API Changes
- Migration Notes

No feature is considered complete without documentation.

# Scalability Guidelines
Design for:
- Multi Branch
- Multi Warehouse
- Multi Company
- Multi Currency

Even if not currently implemented.
Do not introduce architectural decisions that block future expansion.

# Decision Framework
When multiple solutions exist:
1. Choose the simplest solution.
2. Prefer reusable solutions.
3. Prefer configurable solutions.
4. Prefer product-wide solutions.
5. Avoid customer-specific implementations.

If a solution only benefits one customer, justify why it should exist.
