# Feature Request: Add async/background session support in OpenCode macOS app

## Summary
Add support for running AI tasks asynchronously in the background, so users can disconnect from the server without terminating running tasks.

## Problem
Currently, when using the OpenCode macOS app (or any client), closing the client terminates any running task. Users need a way to start long-running tasks that continue after disconnecting.

## Findings

### Workaround via Server API
The OpenCode server already supports async tasks via the `/session/:id/prompt_async` endpoint:

```
POST /session/{session_id}/prompt_async
```

This endpoint:
- Accepts a message and returns immediately (HTTP 204)
- Runs the task on the server in the background
- Task continues even after client disconnects

### Test Results
- Server version: 1.2.24
- Endpoint tested successfully
- Async prompt returns HTTP 204 and runs in background
- Results can be polled via `GET /session/:id/message`

### Current Limitations
1. No native UI support for async tasks in the macOS app
2. Users must either:
   - Use the API directly (requires curl/SDK)
   - Use `tmux`/`screen` on the server
   - Use the web interface (`opencode web`)

### Suggested Solutions

**Option 1: Add async toggle in UI**
Add a toggle in the message input area (similar to the existing "Plan mode" toggle) that switches between sync and async mode.

**Option 2: Background tasks indicator**
Show a notification/indicator when a task is running in the background, with ability to check status later.

**Option 3: Command support**
Add a slash command like `/async` or `/background` to trigger async execution.

## Related API Endpoints
- `POST /session/:id/prompt_async` - Send message without waiting
- `GET /session/:id/message` - Poll for results
- `GET /event` - SSE stream for real-time updates

## Tags
feature-request, opencode, background-tasks
