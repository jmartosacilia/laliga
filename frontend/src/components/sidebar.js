// src/components/contacts.js

import React from 'react'
import { slide as Menu } from "react-burger-menu";

const Sidebar = () => {
  return (
    <Menu>
      <a className="menu-item" href="/">
        Clubs
      </a>

      <a className="menu-item" href="/">
        Players
      </a>
    </Menu>
  )
};

export default Sidebar