<?php
/*
CREATE TABLE IF NOT EXISTS `bloog`.`user` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` VARCHAR(60) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `user_password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `user_full_name` VARCHAR(160) NULL,
  `user_mail` VARCHAR(180) NOT NULL,
  `user_status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 pas actif\n1 actif\n2 banni',
  `user_secret_key` VARCHAR(80) NOT NULL,
  `permission_permission_id` INT UNSIGNED NOT NULL,
*/

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use Exception;

class UserMapping extends AbstractMapping
{
    protected ?int $user_id=null;
    protected ?string $user_login=null;
    protected ?string $user_password=null;
    protected ?string $user_full_name=null;
    protected ?string $user_mail=null;
    protected ?int $user_status=null;
    protected ?string $user_secret_key=null;
    protected ?int $permission_permission_id=null;

    //getters
    public function getUserId():?int{
        return $this->user_id;
    }
    public function getUserLogin():string{
        return $this->user_login;
    }
    public function getUserPassword():string{
        return $this->user_password;
    }
    public function getUserFullName():?string{
        return $this->user_full_name;
    }
    public function getUserMail():string{
        return $this->user_mail;
    }
    public function getUserStatus():?int{
        return $this->user_status;
    }
    public function getUserSecretKey():string{
        return $this->user_secret_key;
    }
    public function getPermissionPermissionId():?int{
        return $this->permission_permission_id;
    }
    //setters
    public function setUserId(?int $user_id){
        if ($user_id < 0)throw new Exception("ID non valide");
        $this->user_id = $user_id;
    }
    public function setUserLogin(?string $user_login){
        $this->user_login = trim(strip_tags($user_login));
    }
    public function setUserPassword(?string $user_password){
        $this->user_password = trim(strip_tags($user_password));
    }
    public function setUserFullName(?string $user_full_name){
        $this->user_full_name = trim(strip_tags($user_full_name));
    }
    public function setUserMail(?string $user_mail){
        $this->user_mail = trim(strip_tags($user_mail));
    }
    public function setUserStatus(?int $user_status){
        $this->user_status = $user_status;
    }
    public function setUserSecretKey(?string $user_secret_key){
        $this->user_secret_key = trim(strip_tags($user_secret_key));
    }
    public function setPermissionPermissionId(?int $permission_permission_id){
        $this->permission_permission_id = $permission_permission_id;
    }

    public function __toString(): string
    {
        return "Cette instance est créée par ".self::class;
    }

}