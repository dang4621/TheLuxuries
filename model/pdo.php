<?php

function pdo_get_connection(){
 

<<<<<<< HEAD
    $servername = "localhost:3306";
=======
<<<<<<< HEAD
    $servername = "localhost:3306";
=======
    $servername = "localhost";
>>>>>>> b3158f0661df79db5f607fe7e4b8d9b224946b06
>>>>>>> 691bef915a27f615526a93b63160e98e611ea5b3
    $username = "root";
    $password = "";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=theluxuries", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    
    }
function pdo_execute($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
}
function pdo_execute_return_lastInsertId($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
}

function pdo_query($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
}
function pdo_query_one($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
}
function pdo_query_value($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
}



