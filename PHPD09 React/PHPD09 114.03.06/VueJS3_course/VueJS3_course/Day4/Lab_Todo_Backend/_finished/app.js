// 以 Express 建立 Web 伺服器
var express = require("express");
var app = express();

// 以 body-parser 模組協助 Express 解析表單與JSON資料
var bodyParser = require('body-parser');
app.use( bodyParser.json() );
app.use( bodyParser.urlencoded({extended: false}) );

// 開放跨域使用
var cors = require("cors");
app.use( cors() );

// 一切就緒，開始接受用戶端連線
app.listen(3000);
console.log("Web伺服器就緒，開始接受用戶端連線.");
console.log("「Ctrl + C」可結束伺服器程式.");


app.get("/", function (request, response) {
    response.send("Hello! This is a Web Server.");
})


var fs = require("fs");
var dataFileName = "./data.json";

app.get("/api/todoitem", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var todoList = JSON.parse(data);
    response.set('Content-Type', 'application/json');
	response.send( JSON.stringify(todoList) );
})


app.get("/api/todoitem/:id", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var todoList = JSON.parse(data);

	var targetIndex = -1;
	for (let i = 0; i < todoList.length; i++) {
		if (todoList[i].TodoItemId.toString() == request.params.id.toString()) {
			targetIndex = i;
			break;
		}
	}
    if ( targetIndex < 0 ) {
        response.send("not found");
        return;
    }

	response.set('Content-Type', 'application/json');
    response.send( JSON.stringify(todoList[targetIndex]) );
})


app.post("/api/todoitem", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var todoList = JSON.parse(data);
	var item = {
		"TodoItemId": new Date().getTime(),
		"Name": request.body.Name,
		"IsComplete": request.body.IsComplete
	};
	todoList.push(item);
	fs.writeFileSync("./data.json", JSON.stringify(todoList, null, "\t"));
	response.send("row inserted.");
})


app.put("/api/todoitem/:id", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var todoList = JSON.parse(data);
	for (let i = 0; i < todoList.length; i++) {
		if (todoList[i].TodoItemId == request.params.id) {
			todoList[i].Name = request.body.Name;
			todoList[i].IsComplete = request.body.IsComplete;
			break;
		}
	}
	fs.writeFileSync("./data.json", JSON.stringify(todoList, null, "\t"));	
	response.send("row updated."); 
})


app.delete("/api/todoitem/:id", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var todoList = JSON.parse(data);

	var deleteIndex = -1;
	for (let i = 0; i < todoList.length; i++) {
		if (todoList[i].TodoItemId.toString() == request.params.id.toString()) {
			deleteIndex = i;
			break;
		}
	}
    if ( deleteIndex < 0 ) {
        response.send("not found");
        return;
    }

    todoList.splice(deleteIndex, 1);
    fs.writeFileSync("./data.json", JSON.stringify(todoList, null, "\t"));	
    response.send("row deleted.");
})
