# Code Quality Rules (Vibe Coding System)

## 🔴 Critical (MUST)
- Each file must have a single responsibility
- Use PDO prepared statements (no raw SQL)
- Never store passwords without hashing
- Code must be understandable before use

## 🟡 Recommended
- Keep files under 300–600 lines
- Reuse code (DRY principle)
- Use clear variable names
- Add logging for debugging

## ⚠️ Avoid
- Mixing HTML and PHP excessively
- Large files (>1000 lines)
- Blind copy/paste from AI

## ❌ Forbidden
- Raw SQL queries with user input
- Ignoring errors or warnings