import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import { Route, Link, BrowserRouter as Router } from 'react-router-dom'
import App from './App';
import Clubs from './components/clubs';
import Players from './components/players';
import * as serviceWorker from './serviceWorker';

ReactDOM.render(<App />, document.getElementById('root'));

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();

const routing = (
    <Router>
        <div>
            <Route exact path="/" component={App} />
            <Route exact path="/clubs" component={Clubs} />
            <Route exact path="/clubs/:id/players" component={Players} />
        </div>
    </Router>
)
ReactDOM.render(routing, document.getElementById('root'))