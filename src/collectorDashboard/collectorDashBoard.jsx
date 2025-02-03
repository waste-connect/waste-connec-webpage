/* eslint-disable no-unused-vars */
import { useState } from "react";
import { BrowserRouter as Router, Routes, Route, Link, Navigate } from "react-router-dom";
import { Bell, Truck, Home, Settings, User, List, Clock, DollarSign, LogOut, MapPin, Moon, Sun } from "lucide-react";
import React from "react";
import DashboardLayout from "./DashboardLayout";

function WasteCollectorDashboard() {
  const [darkMode, setDarkMode] = useState(false);
  const [requests] = useState([
    { id: 1, customer: "John Doe", location: "123 Greenway St, NY", wasteType: "Recyclables", time: "10:30 AM", status: "Pending" },
    { id: 2, customer: "Jane Smith", location: "456 Eco Ave, CA", wasteType: "Organic Waste", time: "12:00 PM", status: "In Progress" },
  ]);
  const [notifications] = useState([
    "New pickup request from Sarah Connor",
    "Your route has been updated",
    "You have 2 pending pickups today",
  ]);

  return (
    <DashboardLayout>
       <div className={`flex h-screen ${darkMode ? "bg-gray-900 text-white" : "bg-gray-100 text-gray-900"}`}>
     
        

     {/* Main Dashboard Content */}
     <div className="w-full p-6">
       <div className="flex justify-between items-center mb-6">
         <h1 className="text-3xl font-bold">Waste Collector Dashboard</h1>
         <Bell className="w-6 h-6 cursor-pointer" />
       </div>

       {/* Dashboard Stats */}
       <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
         <div className="p-6 bg-green-100 border border-green-300 rounded-lg flex items-center shadow-md">
           <Truck className="mr-4 w-12 h-12 text-green-600" />
           <div>
             <h2 className="text-lg font-semibold">Total Pickups</h2>
             <p className="text-3xl font-bold">24</p>
           </div>
         </div>

         <div className="p-6 bg-blue-100 border border-blue-300 rounded-lg flex items-center shadow-md">
           <Clock className="mr-4 w-12 h-12 text-blue-600" />
           <div>
             <h2 className="text-lg font-semibold">Pending Requests</h2>
             <p className="text-3xl font-bold">5</p>
           </div>
         </div>

         <div className="p-6 bg-yellow-100 border border-yellow-300 rounded-lg flex items-center shadow-md">
           <DollarSign className="mr-4 w-12 h-12 text-yellow-600" />
           <div>
             <h2 className="text-lg font-semibold">Earnings</h2>
             <p className="text-3xl font-bold">$1,250</p>
           </div>
         </div>
       </div>

       {/* Pickup Requests Table */}
       <div className="mt-6 bg-white shadow-md p-4 rounded-lg">
         <h2 className="text-lg font-bold mb-3">Pickup Requests</h2>
         <table className="w-full border-collapse border border-gray-300">
           <thead>
             <tr className="bg-gray-200">
               <th className="border p-2">Customer</th>
               <th className="border p-2">Location</th>
               <th className="border p-2">Waste Type</th>
               <th className="border p-2">Time</th>
               <th className="border p-2">Status</th>
             </tr>
           </thead>
           <tbody>
             {requests.map((req) => (
               <tr key={req.id} className="text-center">
                 <td className="border p-2">{req.customer}</td>
                 <td className="border p-2">{req.location}</td>
                 <td className="border p-2">{req.wasteType}</td>
                 <td className="border p-2">{req.time}</td>
                 <td className={`border p-2 ${req.status === "Pending" ? "text-yellow-500" : "text-blue-500"}`}>
                   {req.status}
                 </td>
               </tr>
             ))}
           </tbody>
         </table>
       </div>

       {/* Notifications Panel */}
       <div className="mt-6 p-4 bg-gray-100 shadow-md rounded-lg">
         <h2 className="text-lg font-bold mb-3">Notifications</h2>
         <ul className="space-y-2">
           {notifications.map((note, index) => (
             <li key={index} className="p-2 bg-white shadow rounded-lg">{note}</li>
           ))}
         </ul>
       </div>

       {/* Map Section */}
       <div className="mt-6 p-4 bg-gray-100 shadow-md rounded-lg">
         <h2 className="text-lg font-bold mb-3">Live Map</h2>
         <div className="h-48 bg-gray-300 flex items-center justify-center rounded-lg">
           <span>Map Placeholder (Google Maps/Leaflet.js integration)</span>
         </div>
       </div>
     </div>
   </div>

    </DashboardLayout>
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
