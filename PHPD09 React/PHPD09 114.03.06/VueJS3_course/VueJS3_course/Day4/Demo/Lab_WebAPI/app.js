var fs = require("fs");
var dataFileName = "./data.json";

// 以 Express 建立 Web 伺服器
var express = require("express");
var app = express();

// 允許跨域使用本服務
var cors = require("cors");
app.use(cors());


// 以 body-parser 模組協助 Express 解析表單與JSON資料
var bodyParser = require('body-parser');
app.use( express.json() );
app.use( express.urlencoded({extended: false}) );

// Web 伺服器的靜態檔案置於 public 資料夾
app.use( express.static( "public" ) );

// 一切就緒，開始接受用戶端連線
var port = process.env.port || 3000;
app.listen(port);
console.log("Web伺服器就緒，開始接受用戶端連線.");
console.log("「Ctrl + C」可結束伺服器程式.");

app.get("/home/news", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var newsList = JSON.parse(data);
	response.send( JSON.stringify(newsList) );
})


app.post("/home/news", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var newsList = JSON.parse(data);
	var item = {
		"newsId": new Date().getTime(),
		"ymd": request.body.title,
		"title": request.body.ymd
	};
	newsList.push(item);
	fs.writeFileSync("./data.json", JSON.stringify(newsList));
	response.send("row inserted.");
})


app.put("/home/news", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var newsList = JSON.parse(data);
	for (let i = 0; i < newsList.length; i++) {
		if (newsList[i].newsId == request.body.newsId) {
			newsList[i].title = request.body.title;
			newsList[i].ymd = request.body.ymd;
			break;
		}
	}
	fs.writeFileSync("./data.json", JSON.stringify(newsList));	
	response.send("row updated."); 
})


app.delete("/home/news", function (request, response) {
	var data = fs.readFileSync(dataFileName);
	var newsList = JSON.parse(data);
	var deleteIndex = -1;
	for (let i = 0; i < newsList.length; i++) {
		if (newsList[i].newsId.toString() == request.body.newsId.toString()) {
			deleteIndex = i;
			break;
		}
	}
	if ( deleteIndex >= 0 ) {
		newsList.splice(deleteIndex, 1);
	}
	fs.writeFileSync("./data.json", JSON.stringify(newsList));	
	response.send("row deleted.");    
})

app.get("/home/news/reset", function (request, response) {
	var content = '[{"newsId":1,"ymd":"2017-05-01","title":"News A"},{"newsId":2,"ymd":"2017-05-02","title":"News B"},{"newsId":3,"ymd":"2017-05-03","title":"News C"},{"newsId":4,"ymd":"2017-05-04","title":"News D"},{"newsId":5,"ymd":"2017-05-05","title":"News E"}]';
	fs.writeFileSync("./data.json", content);
	response.send("OK");
})
