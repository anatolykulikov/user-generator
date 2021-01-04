import React, { useState } from 'react';
import { startApp, addUser } from '../../helpers/fetch'
import { ControlPanel, IControlPanelState } from '../ControlPanel';
import { IUser, Userlist } from '../Userlist';
import { Loading } from '../Loading';
import { Error } from '../Error';
import './Wrapper.scss';

export interface IAppInterfaceTexts {
    roleTitle: string;
    roleAdministator: string;
    roleEditor: string;
    roleAuthor: string;
    roleContributor: string;
    roleSubscriber: string;

    controlTitle: string;
    controlButton: string;
    userslistTitle: string;
}

interface IWrapper {
    success: boolean;
    loading: boolean;
    error: boolean;
    errorCode: number | null;
    errorMessage: string;
    ui: IAppInterfaceTexts;
    users: IUser[];
}

interface IUserResponse {
    status: string[];
    data: IUser;
}

export const Wrapper: React.FC = (): JSX.Element => {

    const [state, setState] = useState<IWrapper>({
        success: false,
        loading: false,
        error: false,
        errorMessage: '',
        errorCode: null,
        ui: {
            controlTitle: '',
            controlButton: '',
            userslistTitle: '',
            roleTitle: '',
            roleAdministator: '',
            roleEditor: '',
            roleContributor: '',
            roleAuthor: '',
            roleSubscriber: ''
        },
        users: []
    });

    // When page is loaded - load app
    window.onload = () => {
        LoadApp();
    }

    async function LoadApp() {
        const AppIU = await startApp();
                
        if(AppIU.status) {

            return setState((state) => ({
                ...state,
                success: true,
                loading: true,
                error: false,
                ui: AppIU.data
            }));

        } else {
            return setState((state) => ({
                ...state,
                success: false,
                loading: true,
                error: true,
                errorMessage: AppIU.message,
                errorCode: Number(AppIU.data.status)
            }));
        }
    }


    // User creation function
    const GenerateUsers = (query: IControlPanelState) => {
        return createUser(query.roles, query.userCount, 1);
    }

    async function createUser(roles: string[], total: number, current: number) {

        // Let's take a random role
        const item = Math.floor(Math.random() * roles.length);
        
        // Send a request to create a user
        const user = await addUser({
            role: roles[item]
        });
        
        // Check required amount users
        if(current < total) {
            setTimeout(() => {
                createUser(roles, total, ++current);
            }, 1000);
        }

        // Add new user to list
        return addToUserList(user);
    }


    // Update state for userlist
    const addToUserList = (user: IUserResponse) => {

        const nextState = state.users;
        nextState.push(user.data);

        return setState((state) => ({
            ...state,
            users: nextState
        }));
    }
    
    // App output handler
    switch(true) {

        // Successfully uploaded
        case (state.success && state.loading): {
            return(
                <div className='wrapper'>
                    <ControlPanel text={state.ui} onGenerate={GenerateUsers} />
                    <Userlist text={state.ui} users={state.users} />
                </div>
            );
        }

        // Error loading
        case (state.loading && state.error): {
            return <Error code={state.errorCode} reason={state.errorMessage} />;
        }

        // Default: download status
        default: {
            return <Loading />;
        }
    }    
}