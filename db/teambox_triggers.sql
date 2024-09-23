create trigger ins_message
before insert on message
for each row
begin
    IF NOT EXISTS (
        SELECT *
        FROM users_room
        WHERE id_room = NEW.id_room
          AND id_user = NEW.id_user
    ) THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El contacto no pertenece a la sala.';
    END IF;
end;