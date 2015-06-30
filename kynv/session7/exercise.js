var str = '"Thầy Long nói : Các bạn ôn tập đầy đủ"';
/*var result = str.split(' : ');
console.log(result);

console.log(result.reverse());

var result1 = result.shift();
console.log(result1);
var result2 = result1.split('"');
console.log(result2.shift());
*/
var result = str.split(' : ');
var result1 = result[1];
console.log(result1);

var result2 = result1.split('"');
var result3 =result2[0] ;
console.log(result3);
