import React from "react";
export default function SiteTitle({style, className}) {
    var className = `title ${className}`;
    return <h1 className={className} style={{...style,textAlign: "left",fontWeight: "bold"}}>Perpustakaan<br/>Bersama</h1>
}