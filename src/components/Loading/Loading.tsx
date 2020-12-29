import React from 'react';
import './Loading.scss';

export const Loading: React.FC = (): JSX.Element => {
    return (
        <div className="Loading_wrapper">
            <div className="Loading">
                <span className="big"></span>
                <span className="middle"></span>
                <span className="small"></span>
            </div>
        </div>
        
    )
}