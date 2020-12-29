import React from 'react'
import { Usercard } from '../Usercard'
import './Userlist.scss';

export interface IUser {
    first_name: string;
    last_name: string;
    user_email: string;
    user_login: string;
    user_url: string;
    description: string;
    role: string;
}

export interface IUserlist {
    text: {
        userslistTitle: string;
    };
    users: IUser[];
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