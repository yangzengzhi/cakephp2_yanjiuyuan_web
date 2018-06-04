function getDateTime()
{
	var now=new Date();
	var year=now.getFullYear();
	var month=now.getMonth()+1;
	var day=now.getDate();
	var hours=now.getHours();
	var minutes=now.getMinutes();
	var seconds=now.getSeconds();
	if(month < 10)  month="0"+month;
	if(day < 10) day="0"+day;
	if(hours < 10) hours="0"+hours;
	if(minutes < 10) minutes="0"+minutes;
	if(seconds < 10) seconds="0"+seconds;

	var str = year+"年"+month+"月"+day+"日 "+hours+":"+minutes+":"+seconds+"";
	$("#lblTime").text(str);
}