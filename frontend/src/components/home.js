// src/components/home.js

import React from 'react'
import Container from 'react-bootstrap/Container';

class Home extends React.Component {
    render() {
        return (
            <Container>
                <h2>HELLO</h2>
                <p>Cras facilisis urna ornare ex volutpat, et
                    convallis erat elementum. Ut aliquam, ipsum vitae
                    gravida suscipit, metus dui bibendum est, eget rhoncus nibh
                    metus nec massa. Maecenas hendrerit laoreet augue
                    nec molestie. Cum sociis natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus.</p>

                <p>Duis a turpis sed lacus dapibus elementum sed eu lectus.</p>
            </Container>
        );
    }
}

export default Home;