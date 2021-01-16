import React from 'react';
import { IUser } from '../Userlist'
import { roleTranslator } from '../../helpers/roleTranslator';
import { ITranslations } from '../../helpers/roleTranslator';
import './Usercard.scss';

export interface IUsercard extends IUser {
    first_name: string;
    last_name: string;
    user_email: string;
    user_url: string;
    description: string;
    role: string;
    text: ITranslations;
}

export const Usercard: React.FC<IUsercard> = ({
    first_name,
    last_name,
    user_email,
    user_url,
    role,
    description,
    text
}): JSX.Element => {
    return (
        <li className="UserCard">
            <span className="UserCard__name">{ first_name } { last_name }</span>
            <span className="UserCard__email">{ user_email }</span>
            <span className="UserCard__email">{ user_url }</span>
            <span className="UserCard__email">{ description }</span>
            <span className="UserCard__role">{ roleTranslator(role, text) }</span>
        </li>
    );
}