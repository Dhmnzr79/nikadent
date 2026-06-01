# Nika Theme Rules

Follow [PROJECT_RULES.md](PROJECT_RULES.md) for every change.

Additional implementation notes for Codex:

- Keep templates and styles simple, readable, and consistent with WordPress conventions.
- Prefer extending existing blocks and elements instead of creating near-duplicate variants.
- Before adding a new section, check whether an existing block can be reused or generalized.
- Keep CSS selectors class-based. Avoid tag-qualified selectors and deep nesting.
- Put responsive overrides in one media-query section per file, near the end of the file.
