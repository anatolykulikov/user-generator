import React from 'react'
import { Usercard, IUsercard } from '../Usercard'
import { ITranslations } from '../../helpers/roleTranslator';
import './Userlist.scss';

export interface IUser {
    first_name: string;
    last_name: string;
    user_email: string;
    user_login: string;
    user_url: string;
    description: string;
    role: string;
    text: ITranslations;
}

export interface IUserlist {
    text: ITranslations;
    users: IUsercard[];
}

export const Userlist: React.FC<IUserlist> = ({
    text,
    users
}): JSX.Element => {

    return(
        <div className="userlist">
            <h2>{ text.userslistTitle }</h2>
            <ul>
                {
                    users.map((user, idx: number) => {
                        return <Usercard key={idx} {...user} text={text} />;
                    })
                }
            </ul>
        </div>
    );
}