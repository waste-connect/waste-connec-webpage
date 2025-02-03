import React from 'react'
import { useState } from "react";
import { BrowserRouter as Router, Routes, Route, Link, Navigate } from "react-router-dom";
import { Bell, Truck, Home, Settings, User, List, Clock, DollarSign, LogOut, MapPin, Moon, Sun } from "lucide-react";

const DashboardLayout = ({children }) => {
    const [darkMode, setDarkMode] = useState(false);
  return (
    <div className='flex gap-10'>
         <div className={`w-1/5 p-6 flex flex-col absolute justify-between ${darkMode ? "bg-gray-800" : "bg-gray-900 text-white"}`}>
        <div>
          <h2 className="text-xl font-bold mb-6">Waste Connect</h2>
          <nav className="flex flex-col space-y-4">
            <Link to="/dashboard" className="flex items-center space-x-3 p-3 hover:bg-gray-700 rounded-lg">
              <Home className="w-5 h-5 text-white" /> <span className="text-white">Dashboard</span>
            </Link>
            <Link to="/pickups" className="flex items-center space-x-3 p-3 hover:bg-gray-700 rounded-lg">
              <List className="w-5 h-5 text-white" /> <span className="text-white">Pickups</span>
            </Link>
            <Link to="/profile" className="flex items-center space-x-3 p-3 hover:bg-gray-700 rounded-lg">
              <User className="w-5 h-5 text-white" /> <span className="text-white">Profile</span>
            </Link>
            <Link to="/settings" className="flex items-center space-x-3 p-3 hover:bg-gray-700 rounded-lg">
              <Settings className="w-5 h-5 text-white" /> <span className="text-white">Settings</span>
            </Link>
          </nav>
        </div>
        <div>
          <button onClick={() => setDarkMode(!darkMode)} className="flex items-center space-x-3 p-3 hover:bg-gray-700 rounded-lg">
            {darkMode ? <Sun className="w-5 h-5 text-yellow-400" /> : <Moon className="w-5 h-5 text-blue-400" />}
            <span>Toggle Dark Mode</span>
          </button>
          <button className="flex items-center space-x-3 p-3 hover:bg-gray-700 rounded-lg text-red-400">
            <LogOut className="w-5 h-5" /> <span>Logout</span>
          </button>
        </div>
      </div>
         <main className="dashboard-content ml-60">
                {children}
            </main>
    </div>
  )
}

export default DashboardLayout