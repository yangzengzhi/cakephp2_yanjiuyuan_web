<?php
class db {
    var $connection_id = "";
    var $query_id = "";
    var $record_row = array();
    var $halt = "";
    public function connect($conf_db){
        $this->connection_id = mysql_connect($conf_db['host'] , $conf_db['login'] , $conf_db['pass']);
        if ( ! $this->connection_id ){
            $this->halt("Can not connect MySQL Server");
        }
        if ( ! @mysql_select_db($conf_db['db'], $this->connection_id) ){
            $this->halt("Can not connect MySQL Database");
        }
        if (defined("ENCODING")) {
            @mysql_unbuffered_query("SET NAMES '".ENCODING."'");
        }else{
            @mysql_unbuffered_query("SET NAMES utf8");
        }
        return true;
    }
    //发送SQL 查询，并返回结果集
    private function query($query_id, $query_type='mysql_query'){
        $this->query_id = $query_type($query_id, $this->connection_id);
        if (! $this->query_id ) {
            $this->halt("查询失败:\n$query_id");
        }
        return $this->query_id;
    }
    //发送SQL 查询，并不获取和缓存结果的行
    private function query_unbuffered($sql=""){
        return $this->query($sql, 'mysql_unbuffered_query');
    }
    //从结果集中取得一行作为关联数组
    private function fetch_array($sql = ""){
        if ($sql == "") $sql = $this->query_id;
        $this->record_row = @mysql_fetch_array($sql, MYSQL_ASSOC);
        return $this->record_row;
    }
    //取得结果集中行的数目，仅对 INSERT，UPDATE 或者 DELETE
    function affected_rows() {
        return @mysql_affected_rows($this->connection_id);
    }
    //取得结果集中行的数目，仅对 SELECT 语句有效
    private function num_rows($query_id="") {
        if ($query_id == "") $query_id = $this->query_id;
        return @mysql_num_rows($query_id);
    }
    //返回上一个 MySQL 操作中的错误信息的数字编码
    public function get_errno(){
        $this->errno = @mysql_errno($this->connection_id);
        return $this->errno;
    }
    //取得上一步 INSERT 操作产生的 ID
    function insert_id(){
        return @mysql_insert_id($this->connection_id);
    }
    //释放结果内存
    function free_result($query_id=""){
        if ($query_id == "") $query_id = $this->query_id;
        @mysql_free_result($query_id);
    }
    //关闭 MySQL 连接
    function close_db(){
        if ( $this->connection_id ) return @mysql_close( $this->connection_id );
    }
    //列出 MySQL 数据库中的表
    function get_table_names(){
        global $conf;
        $result = mysql_list_tables($conf["database"]);
        $num_tables = @mysql_numrows($result);
        for ($i = 0; $i < $num_tables; $i++) {
            $tables[] = mysql_tablename($result, $i);
        }
        mysql_free_result($result);
        return $tables;
    }
    //从结果集中取得列信息并作为对象返回，取得所有字段
    function get_result_fields($query_id=""){
        if ($query_id == "") $query_id = $this->query_id;
        while ($field = mysql_fetch_field($query_id)) {
            $fields[] = $field;
        }
        return $fields;
    }
    //错误提示
    function halt($the_error=""){
        $message = $the_error."<br/>\r\n";
        $message.= $this->get_errno() . "<br/>\r\n";
        echo $message;
        exit;
    }
    function __destruct(){
        $this->close_db();
    }
    function sql_select($tbname, $where="", $limit=0, $fields="*", $orderby="", $sort=""){
        $sql = "SELECT ".$fields." FROM `".$tbname."` ".($where?" WHERE ".$where:"").($orderby?" ORDER BY ".$orderby:'')." ".$sort.($limit ? " limit ".$limit:"");
        return $sql;
    }
    function sql_insert($tbname, $row){
        $sqlfield = '';
        $sqlvalue = '';
        foreach ($row as $key=>$value) {
            $sqlfield .= $key.",";
            $sqlvalue .= "'".sf($value)."',";
        }
        return "INSERT INTO `".$tbname."`(".substr($sqlfield, 0, -1).") VALUES (".substr($sqlvalue, 0, -1).")";
    }
    function sql_replace($tbname, $row){
        $sqlfield = '';
        $sqlvalue = '';
        foreach ($row as $key=>$value) {
            $sqlfield .= $key.",";
            $sqlvalue .= "'".sf($value)."',";
        }
        return "REPLACE INTO `".$tbname."`(".substr($sqlfield, 0, -1).") VALUES (".substr($sqlvalue, 0, -1).")";
    }
    function sql_update($tbname, $row, $where){
        $sqlud = '';
        foreach ($row as $key=>$value) {
            $sqlud .= $key."= '".sf($value)."',";
        }
        return "UPDATE `".$tbname."` SET ".substr($sqlud, 0, -1)." WHERE ".$where;
    }
    function sql_delete($tbname, $where){
        return "DELETE FROM `".$tbname."` WHERE ".$where;
    }
    //新增加一条记录
    function row_insert($tbname, $row){
        $sql = $this->sql_insert($tbname, $row);
        return $this->query_unbuffered($sql);
    }
    //新增加一条记录,如果记录存在则更新
    function row_replace($tbname, $row){
        $sql = $this->sql_replace($tbname, $row);
        return $this->query_unbuffered($sql);
    }
    //更新指定记录
    function row_update($tbname, $row, $where){
        $sql = $this->sql_update($tbname, $row, $where);
        return $this->query_unbuffered($sql);
    }
    //删除满足条件的记录
    function row_delete($tbname, $where){
        $sql = $this->sql_delete($tbname, $where);
        return $this->query_unbuffered($sql);
    }
    //根据条件查询，返回所有记录
    function row_select($tbname, $where="", $limit=0, $fields="*", $orderby="", $sort=""){
        $sql = $this->sql_select($tbname, $where, $limit, $fields, $orderby, $sort);
        return $this->row_query($sql);
    }
    //详细显示一条记录
    function row_select_one($tbname, $where, $fields="*", $orderby=""){
        $sql = $this->sql_select($tbname, $where, 1, $fields, $orderby);
        return $this->row_query_one($sql);
    }
    function execute($sql){
        return $this->query_unbuffered($sql);
    }
    //查询多条数据
    function row_query($sql){
        $rs  = $this->query($sql);
        $rs_num = $this->num_rows($rs);
        $rows = array();
        for($i=0; $i<$rs_num; $i++){
            $rows[] = $this->fetch_array($rs);
        }
        $this->free_result($rs);
        return $rows;
    }
    //查询一条数据
    function row_query_one($sql){
        $rs  = $this->query($sql);
        $row = $this->fetch_array($rs);
        $this->free_result($rs);
        return $row;
    }
    //计数统计
    function row_count($tbname, $where=""){
        $sql = "SELECT count(*) as row_sum FROM `".$tbname."` ".($where?" WHERE ".$where:"");
        $row = $this->row_query_one($sql);
        return $row["row_sum"];
    }
}
function sf($v){
    return mysql_escape_string($v);
}
?>