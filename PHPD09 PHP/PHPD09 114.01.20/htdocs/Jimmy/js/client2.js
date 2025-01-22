window.onload = function() {
    var canvas, ctx;
    var webSocket = new WebSocket('ws://10.0.100.160:8888');
    var isConnect = false; // 用來追蹤 WebSocket 連線狀態的旗標


    webSocket.onopen = function(event) {
        isConnect = true; // 當 WebSocket 連線開啟時，將 isConnect 設為 true
    };
    webSocket.onclose = function(event) {
        isConnect = false;  // 當 WebSocket 連線關閉時，將 isConnect 設為 false
    };
     // WebSocket 接收到訊息時的回呼函數
    webSocket.onmessage = function(event) { 
        if(isConnect){
            var drawerObj = JSON.parse(event.data); // 將接收到的訊息轉換為物件
            if (drawerObj.isClear) {
                clear(); // 如果訊息中有 isClear 為 true，則清空畫布
            }else {
                if(drawerObj.isNewLine) {
                    newLine(drawerObj.x, drawerObj.y); // 如果是新的一條線，則開始繪製新線條
                }else {
                    drawLine(drawerObj.x, drawerObj.y); // 否則繪製線條

                }
            }
        } 
    };
    // 獲取畫布元素和上下文
    canvas = document.getElementById('myDrawer');
    ctx = canvas.getContext('2d');
     // 開始繪製新的一條線
    function newLine() {
        ctx.beginPath(); // 開始一條新路徑
        ctx.lineWidth = 4; // 設定線條寬度
        ctx.moveTo(x, y);  // 移動畫筆到指定的 (x, y) 座標
    }
    function drawLine(x, y) { 
        ctx.lineTo(x, y); // 從目前位置畫一條到 (x, y) 座標的線
        ctx.stroke();  // 實際繪製出來
    }
    function clear() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);  // 清除整個畫布
    }

    clear.addEventListener('click', function(event){
        ctx.clearRect(0, 0, canvas.width, canvas.height);  // 清空畫布
    });

    // 當滑鼠按下時，開始繪製
    canvas.addEventListener('mousedown', function(event) {
        isDrag = true; // 設置 isDrag 為 true，表示開始拖動
        var x = event.offsetX, y = event.offsetY; // 取得滑鼠按下時的座標
        ctx.beginPath(); // 開始新的繪圖路徑
        ctx.lineWidth = 4; // 設定線條寬度
        ctx.moveTo(x, y);  // 移動畫筆到按下的座標
    });
    // 當滑鼠放開時，停止繪圖
    canvas.addEventListener('mouseup', function(event) {
        isDrag = false; // 設置 isDrag 為 false，表示停止拖動
    });
    canvas.addEventListener('mousemove', function(event) {
        if(isDrag) { // 當 isDrag 為 true 時，繪製線條
            var x = event.offsetX, y = event.offsetY;  // 取得滑鼠的當前座標
            ctx.lineTo(x, y);  // 將當前滑鼠位置連接到上一個位置
            ctx.stroke();  // 繪製線條
        }
    });
}