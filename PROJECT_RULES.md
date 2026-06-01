# Project Rules

## Goal

This theme should stay lightweight, predictable, and easy to extend without style drift.

## General

- One task should produce one clean solution, not a quick patch on top of another quick patch.
- Reuse existing blocks, variables, and patterns before adding new ones.
- Keep files small and readable. If a file grows noisy, split responsibility instead of stacking exceptions.

## Markup

- Use BEM naming: `block`, `block__element`, `block--modifier`.
- New classes must describe purpose, not appearance.
- Avoid anonymous wrappers and unnecessary nesting in templates.
- Prefer dedicated element classes over descendant selectors.

## Styles

- No `!important`.
- No duplicated declarations, duplicated selectors, or copy-paste variants with tiny differences.
- Use CSS variables for repeated colors, spacing tokens, shadows, or radii.
- Keep selectors flat and class-based.
- Group responsive overrides in a single media-query section at the bottom of the stylesheet.
- If a new component needs many exceptions, refactor the component instead of adding overrides around it.

## Responsive

- Desktop and mobile are both required by default.
- Build base styles first, then collect responsive overrides together.
- Do not scatter one-off media queries across the file.

## WordPress / PHP

- Follow WordPress escaping and template conventions.
- Do not add business logic into templates when it can live in a function.
- Preserve existing theme behavior unless the task explicitly changes it.

## Before Finishing

- Check whether a new class duplicates an existing block.
- Check whether a style can be expressed through an existing token or variable.
- Check whether responsive changes were added in the shared media-query area.
- Check whether the result still reads cleanly without comments explaining obvious code.
