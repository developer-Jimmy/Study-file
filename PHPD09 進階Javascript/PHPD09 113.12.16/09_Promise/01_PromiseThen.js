function longTimeWork(workFine = true, errorMessage = "test") {
    return new Promise((yes, no) => {
        setTimeout(() => {
            (workFine) ? yes(1200) : no(errorMessage);
        }, 3000);
    })
}

function main() {
    console.log("go ahead v3");
    var aPromise = longTimeWork(true, "test")
    aPromise.then(function (e) {
        console.log("finished v3: " + e);
    })
    // console.log("go ahead v3");
}



// function main() {
//     longTimeWork(true, "test")  // try true/false
//     .then(function (e) {
//         console.log(e);
//     })
//     .catch(function (e) {
//         console.log(e);
//     })
// }

main();
