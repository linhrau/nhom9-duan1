<?php
//Hàm kết nối đến CSDL phương thức PDO 
function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=new", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// Thực thi câu lệnh SQL thao tác dữ liệ như (INSERT, UPDATE, DELETE)
function pdo_execute($sql, $params = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
    } catch (PDOException $e) {
        error_log("PDO Error: " . $e->getMessage()); // Log lỗi để xem trong nhật ký
        throw $e;
    } finally {
        unset($conn);
    }
}

function get_last_inserted_id() {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->query("SELECT LAST_INSERT_ID()");
        $id = $stmt->fetchColumn();
        return $id;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function pdo_execute_return_lastInsertId($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection(); //kết nối đến 
        $stmt=$conn->prepare($sql);//chuẩn hóa
        $stmt->execute($sql_args);//Thực hiện câu lệnh 
        return $conn->lastInsertId();

    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

// thực thi câu lệnh SQL truy vấn kiểu (SELECT * FROM tên bảng) => trả về nhiều bản ghi
function pdo_query($sql, $params = []){
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch results as associative array
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

//thực thi câu lệnh SQL truy vấn dl (SELECT * FROM tên bảng WHERE id/name/mã...) => trả về duy nhất 1 bản ghi
function pdo_query_one($sql, $params = []) {
    $pdo = pdo_get_connection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>