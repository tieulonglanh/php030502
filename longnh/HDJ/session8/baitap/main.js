function executeOperation() {
    var re = confirm("Bạn muốn thực hiện không?");
    if(!re)
        return false;
    
    var firstnum = document.getElementById('firstnum').value;
    var secondnum = document.getElementById('secondnum').value;
    var operator = document.getElementById('operator').value;
    
    if(!firstnum) {
        alert('Chưa nhập số thứ 1');
        return false;
    }
    
    if(!secondnum) {
        alert('Chưa nhập số thứ 2');
        return false;
    }
        
    if(!operator) {
        alert('Chưa nhập phép tính');
        return false;
    }    
    
    var opeArr = ['+','-','*','/','%'];
    console.log(operator);
    if(opeArr.indexOf(operator) < 0) {
        alert('Không nhập đúng phép tính');
        return false;
    }
    
    var str = firstnum + operator + secondnum;
    var result = eval(str);
    document.getElementById('result').value = result;   
        
}