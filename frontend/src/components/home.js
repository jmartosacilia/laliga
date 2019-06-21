// src/components/home.js

import React from 'react'
import {NavLink} from 'react-router-dom'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col'
import Figure from 'react-bootstrap/Figure'
import laliga from '../images/laliga.png';

class Home extends React.Component {
    render() {
        return (
            <Container >
                <h2>HOME</h2>
                <br/>
                <Row className="text-center">
                    <Col>
                        <Figure>
                            <p>This is an application created with ReactJS 16.3.</p>
                            <p>If you go to the <NavLink to="/clubs">Clubs</NavLink> tab you will see a list of teams belonging to LaLiga.</p>
                            <p>Clicking on the shields you can see the list of players of the team selects.</p>
                            <p>If you go directly to the <NavLink to="/players">Players</NavLink> tab you will see a list of all players.</p>
                            <p>You can also add a player from the <NavLink to="/players/add">Add Players</NavLink> tab.</p>
                        </Figure>
                    </Col>
                </Row>
                <Row className="text-center">
                    <Col>
                        <Figure>
                            <Figure.Image
                                width={120}
                                height={120}
                                alt="120x120"
                                src={laliga}
                            />
                        </Figure>
                    </Col>
                </Row>
            </Container>
        );
    }
}

export default Home;