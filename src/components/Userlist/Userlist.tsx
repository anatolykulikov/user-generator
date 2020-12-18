import React from 'react'
import './Userlist.scss';

interface IUserlist {
    users: object[];
}

export const Userlist: React.FC<IUserlist> = ({users}): JSX.Element => {
    return(
        <div className="userlist">
            Список пользователей
            <ul>
                {
                    /*
                    users.map((user: string, idx: number) => {
                        return <li key={idx}>{user}</li>;
                    })
                    */
                }
            </ul>
        </div>
    );
}