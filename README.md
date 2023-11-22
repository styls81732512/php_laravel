# 轉換匯率 API

## Running the service

```bash
# serve
php artisan serve
```

### 目錄結構

-   app
    -   Exceptions
        -   GlobalExceptionHandler.php // 全域 exception 攔截
        -   ApiException.php
    -   Http
        -   Controllers
            -   Admin // 後台 Controller
                -   InterviewController.php // 匯率轉換控制器
            -   Public // 前台 Controller
                -   ...
        -   Middleware
        -   Requests
            -   ExchangeRequest.php // 驗證 params
-   routes
    -   api.php // api 路由配置

### 創建訂單

-   文件位置: app/Http/Controllers/Admin/V1/InterviewController.php
-   請求方式:
    -   GET
    -   content-type: application/json
-   請求地址: /admin/v1/interview/exchange
-   請求參數:

```json
{
    "source": "USD",
    "target": "JPY",
    "amount": "1525"
}
```

-   返回結果:

```json
{
    "msg": "success",
    "amount": "170,496.53"
}
```
