function tang(x){
    var cha = x.parentElement;
    var soluongcu = cha.children[1];
    var soluongmoi =  parseInt(soluongcu.innerText)+1;
    soluongcu.innerText=soluongmoi;
}

function giam(x){
    var cha = x.parentElement;
    var soluongcu = cha.children[1];
    if (parseInt(soluongcu.innerText)>1) {
        var soluongmoi =  parseInt(soluongcu.innerText)-1;
    }else{
        alert("Số lượng không được dưới 1 sản phẩm !");
        var soluongmoi =  parseInt(soluongcu.innerText);
    }
    soluongcu.innerText=soluongmoi;
}

// chi tiết sản phẩm

function tangCT(x){
    var cha = x.parentElement;
    var soluongcu = cha.children[4];
    var soluongmoi =  parseInt(soluongcu.innerText)+1;
    soluongcu.innerText=soluongmoi;
}

function giamCT(x){
    var cha = x.parentElement;
    var soluongcu = cha.children[4];
    if (parseInt(soluongcu.innerText)>1) {
        var soluongmoi =  parseInt(soluongcu.innerText)-1;
    }else{
        alert("Số lượng không được dưới 1 sản phẩm !");
        var soluongmoi =  parseInt(soluongcu.innerText);
    }
    soluongcu.innerText=soluongmoi;
}

// END chi tiết sản phẩm