import React, { useState } from 'react';
import './ControlPanel.scss';

interface IControlPanel {
    onGenerate: (state: IControlPanelState) => void;
}

export interface IControlPanelState {
    userCount: number;
    roles: string[];
}

export const ControlPanel: React.FC<IControlPanel> = ({onGenerate}): JSX.Element => {

    const maxUsersCount = 20;

    const randomUserCount = () => {
        return Math.floor(Math.random() * Math.floor(maxUsersCount));
    }

    const [state, setState] = useState<IControlPanelState>({
        userCount: randomUserCount(),
        roles: ['subscriber']
    });

    const handleArray = (add: boolean, prevArr: string[], element: any) => {
        if(add) {
            prevArr.push(element);
        } else {
            const deletedItemIndex = prevArr.indexOf(element);
            if(deletedItemIndex !== -1) {
                prevArr.splice(deletedItemIndex, 1);
            }
        }

        return prevArr;
    }

    const handleInput = (e: React.ChangeEvent<HTMLInputElement>) => {
        const changedValue = () => {
            switch(e.target.name) {
                case 'userCount': {
                    return Number(e.target.value);
                }

                case 'roles': {
                    return handleArray(e.target.checked, state.roles, e.target.value);
                }

                default: {
                    return e.target.value;
                }
            }
        }

        setState((state) => ({
            ...state,
            [e.target.name]: changedValue()
        }));
    }

    const inputCheckedHandler = (name: string) => {
        if(state.roles.includes(name)) {
            return true;
        } else {
            return false;
        }
    }

    const generateUsers = () => {
        onGenerate(state);
    }

    return(
        <div className='control_panel'>
            <div className='setting_block'>
                <h2>Сколько пользователей нужно?</h2>
                <label className='range_wrapper'>
                    <span>{state.userCount}</span>
                    <input type='range' name='userCount' value={state.userCount} min={1} max={maxUsersCount} step={1} onChange={handleInput} />
                </label>
            </div>
            <div className='setting_block'>
                <h2>Роли пользователей</h2>
                <label className='checkbox_wrapper'>
                    <input type='checkbox' name='roles' value='administator' onChange={handleInput} checked={inputCheckedHandler('administator')} />
                    <span>Администратор</span>
                </label>
                <label className='checkbox_wrapper'>
                    <input type='checkbox' name='roles' value='editor' onChange={handleInput} checked={inputCheckedHandler('editor')} />
                    <span>Редактор</span>
                </label>
                <label className='checkbox_wrapper'>
                    <input type='checkbox' name='roles' value='author' onChange={handleInput} checked={inputCheckedHandler('author')} />
                    <span>Автор</span>
                </label>
                <label className='checkbox_wrapper'>
                    <input type='checkbox' name='roles' value='contributor' onChange={handleInput} checked={inputCheckedHandler('contributor')} />
                    <span>Участник</span>
                </label>
                <label className='checkbox_wrapper'>
                    <input type='checkbox' name='roles' value='subscriber' onChange={handleInput} checked={inputCheckedHandler('subscriber')} />
                    <span>Подписчик</span>
                </label>
            </div>
            <button className="button button-primary" type="button" onClick={generateUsers}>Сгенерировать</button>
        </div>
    );
}