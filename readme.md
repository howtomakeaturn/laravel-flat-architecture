# 🚀 Laravel Flat Architecture

這是 **Laravel Flat Architecture** 的官方範例庫，包含：
- ✅ **完整的 Queries + Mutations 架構示範**
- ✅ **不同應用場景的實作範例**
- ✅ **實際專案的應用案例**

## 📖 Laravel Flat Architecture 是什麼？

Laravel Flat Architecture 是一種為 Laravel 設計的扁平化架構模式

核心理念：
- ✅ Flat → 讓 Laravel 應用更扁平，避免傳統 Service 層的肥大問題

👉 [點此閱讀 Laravel Flat Architecture 架構介紹 🚀](https://codelove.tw/@howtomakeaturn/post/xd0Ykx)

## 這樣的架構有什麼好處？

### ✅ Controller 變得簡潔
Controller 只負責接收請求、調用相應的 Query 或 Mutation，然後返回結果，不會有複雜的商業邏輯或資料庫查詢邏輯。

### ✅ 邏輯分層明確
- Query 負責查詢資料（讀取）
- Mutation 負責變更資料（新增、修改、刪除）

### ✅ 更容易測試
- 測試 Query 和 Mutation 時不需要 HTTP Request，可以單獨測試查詢與變更邏輯。

### ✅ 可以在不同地方重用
- 例如在 API、後台管理、排程任務（Jobs）、CLI 指令（Commands） 都可以共用相同的 Query 和 Mutation。

## 如何讓 Controller 保持價值？
如果你希望 Controller 不要變得完全沒有存在感，可以考慮讓它負責：

### 處理驗證邏輯
例如 FormRequest 或 Validator 來確保請求參數正確。

### 組合多個 Query/Mutation
有時候一個請求可能需要調用 多個 Query/Mutation，這時 Controller 仍然發揮作用。

### 處理請求與響應轉換
例如格式化 API 回應、設定 HTTP 狀態碼等。

## 🔥 想學習更多 Laravel Flat Architecture？

本 repo 提供免費的 Laravel Flat Architecture 範例，但如果你想要完整的 Laravel Flat Architecture 深入應用、最佳實踐、企業級架構設計，你可以參考：

- 📘 [Laravel Flat Architecture 架構完整指南（電子書）](https://codelove.tw/@howtomakeaturn/post/qBgOdx)
<!-- - 🧑‍💻 Laravel Flat Architecture 企業內訓 & 架構顧問（專案導入） -->

👉 [點此獲取完整 Laravel Flat Architecture 內容 💰](https://codelove.tw/@howtomakeaturn/post/qBgOdx)
