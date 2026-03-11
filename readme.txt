=== Kanban Board Block ===

Contributors:      WordPress Telex
Tags:              block, kanban, project-management, tasks, drag-and-drop
Tested up to:      6.8
Stable tag:        0.1.0
License:           GPLv2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

A fully interactive Kanban board block for WordPress. Manage tasks across columns with drag-and-drop, inline editing, and REST API persistence.

== Description ==

The Kanban Board Block brings project management directly into your WordPress site. It registers a custom "Task" post type and a "Column" taxonomy, then renders them as a beautiful, interactive Kanban board.

**Editor Experience:**
* Read-only static preview of your Kanban board columns and task cards
* Clean, non-interactive snapshot showing term names as column headers and task titles with descriptions

**Frontend Experience:**
* Fully interactive board powered by the WordPress Interactivity API
* Drag-and-drop task cards within and across columns using native drag events
* Smooth animated drag feedback with placeholder indicators and CSS transitions
* Add new task cards inline with a title and optional short description
* All changes persist automatically via the WordPress REST API

**Design:**
* Responsive CSS grid layout that stacks vertically on mobile devices
* Cards styled with subtle box shadows and rounded corners
* Uses theme.json color palette tokens when available
* Falls back to a clean minimal palette with soft neutral tones

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/telex-kanban-board` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Create some Column terms under Tasks > Columns (e.g., "To Do", "In Progress", "Done").
4. Optionally create Task posts and assign them to columns.
5. Insert the "Kanban Board Block" into any post or page.

== Frequently Asked Questions ==

= How do I create columns? =

Go to Tasks > Columns in the WordPress admin and add taxonomy terms. Each term becomes a column on the board.

= How do I add tasks? =

On the frontend, each column has an "Add card" button. You can also create Task posts in the admin and assign them to a column.

= Does drag-and-drop persist? =

Yes. When you move a card to a different column or reorder within a column, changes are saved automatically via the REST API.

== Changelog ==

= 0.1.0 =
* Initial release with full Kanban board functionality
* Drag-and-drop support via Interactivity API
* REST API persistence for task positions and column assignments
* Responsive grid layout