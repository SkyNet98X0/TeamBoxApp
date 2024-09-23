<?php

const S_CLASSMATES = 'select * from classmate where id_user = :id_user';

const S_BY_EMAIL = 'select email, password from user where email = :email';

const I_USER = 'insert into user(nickname, email, password) value(:nickname, :email, :password)';

?>