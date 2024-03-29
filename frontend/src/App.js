// src/App.js

import React, { Component } from 'react';
import {NavLink} from 'react-router-dom'
import {HashRouter} from 'react-router-dom'
import {Route} from 'react-router-dom'
import Home from './components/home';
import Clubs from './components/clubs';
import Players from './components/players';
import AddPlayers from './components/add-players';

class App extends Component {
  render() {
      return (
          <HashRouter>
              <div>
                  <ul className="header">
                      <li><NavLink exact to="/">Home</NavLink></li>
                      <li><NavLink to="/clubs">Clubs</NavLink></li>
                      <li><NavLink exact to="/players">Players</NavLink></li>
                      <li><NavLink exact to="/players/add">Add Players</NavLink></li>
                  </ul>
                  <div className="content">
                      <Route exact path="/" component={Home}/>
                      <Route exact path="/clubs" component={Clubs}/>
                      <Route exact path="/players" component={Players}/>
                      <Route exact path="/players/add" component={AddPlayers}/>
                  </div>
              </div>
          </HashRouter>
      );
  }
}

export default App;