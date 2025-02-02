import { BrowserRouter as Router, Routes, Route, Link, Navigate } from "react-router-dom";
import { Bell, Truck, Home, Settings, User, List, Clock, DollarSign } from "lucide-react";
// eslint-disable-next-line no-unused-vars
import React from "react";

function WasteCollectorDashboard() {
  return (
    <div className="flex h-screen">
      {/* Sidebar Navigation */}
      <div className="w-1/5 bg-gray-800 text-white p-6 flex flex-col space-y-4">
        <h2 className="text-lg font-bold">Waste Connect</h2>
        <nav className="flex flex-col space-y-3">
          <Link to="/dashboard" className="flex items-center space-x-2 p-2 hover:bg-gray-700 rounded">
            <Home className="w-5 h-5" /> <span>Dashboard</span>
          </Link>
          <Link to="/pickups" className="flex items-center space-x-2 p-2 hover:bg-gray-700 rounded">
            <List className="w-5 h-5" /> <span>Pickups</span>
          </Link>
          <Link to="/profile" className="flex items-center space-x-2 p-2 hover:bg-gray-700 rounded">
            <User className="w-5 h-5" /> <span>Profile</span>
          </Link>
          <Link to="/settings" className="flex items-center space-x-2 p-2 hover:bg-gray-700 rounded">
            <Settings className="w-5 h-5" /> <span>Settings</span>
          </Link>
        </nav>
      </div>

      {/* Main Dashboard Content */}
      <div className="w-4/5 p-6">
        <div className="flex justify-between items-center">
          <h1 className="text-2xl font-bold">Waste Collector Dashboard</h1>
          <Bell className="w-6 h-6 text-gray-600" />
        </div>

        {/* Dashboard Stats */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
          <div className="p-4 bg-green-100 border border-green-300 rounded-lg flex items-center">
            <Truck className="mr-4 w-10 h-10 text-green-600" />
            <div>
              <h2 className="text-lg font-semibold">Total Pickups</h2>
              <p className="text-2xl font-bold">24</p>
            </div>
          </div>

          <div className="p-4 bg-blue-100 border border-blue-300 rounded-lg flex items-center">
            <Clock className="mr-4 w-10 h-10 text-blue-600" />
            <div>
              <h2 className="text-lg font-semibold">Pending Requests</h2>
              <p className="text-2xl font-bold">5</p>
            </div>
          </div>

          <div className="p-4 bg-yellow-100 border border-yellow-300 rounded-lg flex items-center">
            <DollarSign className="mr-4 w-10 h-10 text-yellow-600" />
            <div>
              <h2 className="text-lg font-semibold">Earnings</h2>
              <p className="text-2xl font-bold">$1,250</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Navigate to="/dashboard" />} />
        <Route path="/dashboard" element={<WasteCollectorDashboard />} />
      </Routes>
    </Router>
  );
}