function tinhtoan() {
//    alert('a');
    var re = confirm('Bạn chắc chắn muốn tính giá trị chứ?'); // hỏi người dùng muốn tính toán không?
    if(!re) // Kiểm tra người dùng có đồng ý không, nếu ko đồng ý thì xử lý bên dưới
        return false; //trả về false và khôn tiếp tục thực hiện nữa
    
    console.log(document.getElementById('addtxt').value);
    
    if(!document.getElementById('addtxt').value) {
        alert("Bạn chưa nhập dữ liệu");
        return false;
    }
        
    var result = eval(document.getElementById('addtxt').value); // lấy giá trị từ ô nhập phép tính và xử lý
    
    document.getElementById('result').value = parseInt(result); // gán giá trị vào ô kết quả
}