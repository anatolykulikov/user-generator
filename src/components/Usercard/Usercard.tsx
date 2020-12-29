import React from 'react';
import { IUser } from '../Userlist'
import { roleTranslator } from '../../helpers/roleTranslator';
import './Usercard.scss';

interface IUsercard extends IUser {
    text: object;
}

export const Usercard: React.FC<IUsercard> = ({
    first_name,
    last_name,
    user_email,
    user_url,
    role,
    text
}): JSX.Element => {

    console.log(text);

    return (
        <li className="UserCard">
            <span className="UserCard__name">{ first_name } { last_name }</span>
            <span className="UserCard__email">{ user_url }</span>
            <span className="UserCard__email">{ user_email }</span>
            <span className="UserCard__role">{ roleTranslator(role, text) }</span>
        </li>
    );
}