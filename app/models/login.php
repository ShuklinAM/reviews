<?php

class loginModel
{
    protected $_table = 'admin';

    public function getAdmin($login, $password)
    {
        $password = $this->codePassword($password);
        return Db::getRowWhere($this->_table, array('login' => $login, 'password' => $password));
    }

    protected function codePassword($password)
    {
        return md5($password);
    }
}