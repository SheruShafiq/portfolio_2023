import axios from "axios";
import React from "react";
import { useState, useEffect } from "react";
import "./formcss.css";
import giffyLoad from "../assets/loading-gif.gif";

const App = ({ response, data: { id, name } }) => {
  const [activeUsers, setActiveUsers] = useState("");
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const res = await axios.post(`
https://content-analyticsdata.googleapis.com/v1beta/properties/${id}:runRealtimeReport?alt=json`,
          {
            metrics: [{ name: "activeUsers" }],
          },
          {
            headers: {
              Authorization: `Bearer ${response}`,
            },
          }
        );

        const value = res.data.rows?.[0]?.metricValues?.[0]?.value || 0;
        setActiveUsers(value);
        setLoading(false);
      } catch (err) {
        console.error(err);
      }
    };

    fetchData();
    const intervalId = setInterval(fetchData, 5000);
    return () => clearInterval(intervalId);

  }, [id, response]);

  return (
    <div className="form">
      {loading ? (
        <div id="sunDiv">
          <img id="loading" src={giffyLoad} alt="" />
        </div>
      ) : (
        <div id="results">
          <p>{name}</p>
          <p id="total">{activeUsers}</p>
        </div>
      )}
    </div>
  );
};

export default App;




