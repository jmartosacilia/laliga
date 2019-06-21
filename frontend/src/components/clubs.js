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
                        <Col xs={4} className="text-center" key={club.id}>
                                <Figure>
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
                                            src={process.env.REACT_APP_API_URL + '/' + club['shield']}
                                        />
                                        <Figure.Caption>
                                            <h4>{club['name']}</h4>
                                        </Figure.Caption>
                                    </NavLink>
                                </Figure>
                        </Col>
                    ))}
                </Row>
            </Container>)
    }
    componentDidMount() {
        const uri = process.env.REACT_APP_API_URL + '/api/v1/clubs';
        fetch(uri)
            .then(res => res.json())
            .then((data) => {
                this.setState({ clubs: data })
            })
            .catch(console.log);
    }
}
export default Clubs;