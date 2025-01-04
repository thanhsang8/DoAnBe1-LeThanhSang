<?php 
class User extends Database
{
    public function login($username, $password) {
        $db_data = parent::$connection->prepare("SELECT password, role FROM users WHERE user = ?");
        $db_data->bind_param('s', $username);
        $db_data->execute();
        
        $result = $db_data->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Lấy mật khẩu đã hash từ cơ sở dữ liệu
            $hashed_password_from_db = $row['password'];
            $role_from_db = $row['role'];
            
            // Xác minh mật khẩu và kiểm tra role
            if (password_verify($password, $hashed_password_from_db)) {
                return $role_from_db; // Trả về giá trị role từ cơ sở dữ liệu
            } else {
                return false; // Trả về false nếu mật khẩu không hợp lệ
            }
        } else {
            // Người dùng không tồn tại
            return false;
        }
    }
    

    public function logout() {
        
    }

    public function register($username, $password) {
        // Kiểm tra xem người dùng đã tồn tại hay chưa
        $checkSql = parent::$connection->prepare("SELECT user FROM users WHERE user = ?");
        $checkSql->bind_param('s', $username);
        $checkSql->execute();
    
        $checkResult = $checkSql->get_result();
    
        // Kiểm tra xem người dùng đã tồn tại hay chưa
        if ($checkResult->num_rows > 0) {
            // Người dùng đã tồn tại
            return false;
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            // Tạo câu SQL INSERT nếu người dùng chưa tồn tại
            $insertSql = parent::$connection->prepare("INSERT INTO users (user, password) VALUES (?, ?)");
            $insertSql->bind_param('ss', $username, $hashedPassword);
            $insertSql->execute();
    
            // Đăng ký thành công
            return true;
        }
    }
    
    
}