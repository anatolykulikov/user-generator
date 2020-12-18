import React, { useState } from 'react';
import { addUser } from '../../helpers/fetch'
import { ControlPanel, IControlPanelState } from '../ControlPanel';
import { Userlist } from '../Userlist';
import './Wrapper.scss';


export interface IWrapperState {
    users: object[];
}

export const Wrapper: React.FC = (): JSX.Element => {

    const [state, setState] = useState<IWrapperState>({
        users: []
    });

    const GenerateUsers = (query: IControlPanelState) => {
        return createUser(query.roles, query.userCount, 1);
    }

    async function createUser(roles: string[], total: number, current: number) {

        const item = Math.floor(Math.random() * roles.length);
        
        const user = await addUser({
            role: roles[item]
        });
        
        if(current < total) {
            setTimeout(() => {
                createUser(roles, total, ++current);
            }, 1000);
        }

        return addToUserList(user);
    }

    const addToUserList = (user: object) => {

        console.log('addToUserList', user);

        return true;

        const nextState = state.users;
        nextState.push(user);

        return setState((state) => ({
            ...state,
            users: nextState
        }));
    }
    

    return(
        <div className='wrapper'>
            <ControlPanel onGenerate={GenerateUsers} />
            <Userlist users={state.users} />
        </div>
    );
}

/*

        */