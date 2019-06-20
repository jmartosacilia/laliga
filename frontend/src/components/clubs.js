// src/components/players.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import Figure from 'react-bootstrap/Figure'
import {NavLink} from 'react-router-dom'

class Clubs extends React.Component {
    state = {
        clubs: []
    };
    render() {
        return (
            <Container>
                <h2>CLUBS</h2>
                <br/>
                <Row className="text-center">
                    {this.state.clubs.map((club, index) => (
                        <Col xs={4}>
                                <Figure class="text-center">
                                    <NavLink
                                        to={"/players?club=" + club.id}
                                        style={{textDecoration:'none'}}
                                        key={index}
                                        onClick={this.handleClick}
                                    >
                                        <Figure.Image
                                            width={120}
                                            height={120}
                                            alt="120x120"
                                            src={"http://laliga-api.loc/" + club['shield']}
                                        />
                                        <Figure.Caption class="text-center">
                                            <p>{club['name']}</p>
                                        </Figure.Caption>
                                    </NavLink>
                                </Figure>
                        </Col>
                    ))}
                </Row>
            </Container>)
    }
    componentDidMount() {
        fetch('http://laliga-api.loc/api/v1/clubs')
            .then(res => res.json())
            .then((data) => {
                console.log(data);
                this.setState({ clubs: data })
            })
            .catch(console.log);
    }
}
export default Clubs;