window.onload = function() {
    var canvas, ctx, clear;
    var webSocket = new WebSocket('ws://10.0.100.160:8888');
    var isConnect = false; // 用來追蹤 WebSocket 連線狀態的旗標
    var isDrag = false;  // 用來追蹤滑鼠拖曳狀態的旗標

    // WebSocket 連線成功時的回呼函數
    webSocket.onopen = function(event) {
        isConnect = true;
    };
    // 連線關閉後將 isConnect 設為 false
    webSocket.onclose = function(event) {
        isConnect = false;
    };
    // 獲取 DOM 元素的引用
    clear = document.getElementById('clear');
    canvas = document.getElementById('myDrawer');
    ctx = canvas.getContext('2d');  // 獲取 canvas 的 2D 繪圖上下文
    // 為 "clear" 按鈕添加點擊事件監聽器，點擊後清空畫布
    clear.addEventListener('click', function(event){
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        if(isConnect) {
            // 如果 WebSocket 連線正常，發送訊息告訴伺服器畫布已被清空
            var data = {
                isClear : true
            };
            // 將清空的狀態發送給伺服器
            webSocket.send(JSON.stringify(data));
        }
    });

      // 為 canvas 添加滑鼠按下事件監聽器，開始繪圖
    canvas.addEventListener('mousedown', function(event) {
        isDrag = true; // 設定 isDrag 為 true，表示滑鼠開始拖動
        var x = event.offsetX, y = event.offsetY; // 獲取滑鼠按下時的座標
        ctx.beginPath();  // 開始一條新的路徑
        ctx.lineWidth = 4; // 設定線條寬度
        ctx.moveTo(x, y); // 將起點移動到滑鼠按下的位置

        var data = {
            isClear : false, // 繪製時清空畫布的旗標是 false
            isNewLine : false,  // 新的一條線
            x : x, // 滑鼠的 x 座標
            y : y // 滑鼠的 y 座標
        };
        if(isConnect) webSocket.send(JSON.stringify(data));
         // 如果 WebSocket 連線正常，發送繪圖資料
    }); 
    // 為 canvas 添加滑鼠放開事件監聽器，停止繪圖
    canvas.addEventListener('mouseup', function(event) {
        isDrag = false;  // 設定 isDrag 為 false，表示滑鼠停止拖動
    });
    // 為 canvas 添加滑鼠移動事件監聽器，繪製線條
    canvas.addEventListener('mousemove', function(event) {
        if(isDrag) {
            var x = event.offsetX, y = event.offsetY; // 獲取當前滑鼠的位置
            ctx.lineTo(x, y); // 將當前滑鼠位置連接到上一個位置
            ctx.stroke(); // 繪製線條
        }
    });
}