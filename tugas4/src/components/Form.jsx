import { Fragment, useState } from "react";

export default function Form(props)
{
    // hobby data collector
    const [box, setBox] = useState([]);
    let arr = box;

    const handleSubmit = (e) => {
        e.preventDefault();
        const data = e.target;
        
        // save box checked
        setBox(arr);

        // convert hobby data to string
        let hobby = "";
        for(let i = 0; i < arr.length; i++){
            hobby += arr[i];
            if(i < arr.length-1) hobby += ", ";
        }

        // call setData on App.js
        props.setData(data.name.value, data.born.value, data.sex.value, hobby, data.religion.value, data.message.value);
    }

    // push or remove hobby checked to collector hobby
    const boxChecked = (e) => {
        if(e.target.checked) arr.push(e.target.value);
        else {
            for(let i = 0; i < arr.length; i++){
                if(arr[i] == e.target.value) arr.splice(i, 1);
            }
        }
    }

    return(
        <Fragment>
            <form action="" onSubmit={handleSubmit}>
                <li>
                    <label htmlFor="name">Nama Lengkap</label>
                    <input type="text" name="name" id="name" autoFocus />
                </li>
                <li>
                    <label htmlFor="born">Tanggal Lahir</label>
                    <input type="date" name="born" id="born" />
                </li>
                <li>
                    <label htmlFor="sex">Jenis Kelamin</label>
                    <div className="option">
                        <input type="radio" name="sex" id="sex1" value="Laki-laki" />
                        <label htmlFor="sex1">Laki-laki</label>
                        <input type="radio" name="sex" id="sex2" value="Perempuan" />
                        <label htmlFor="sex2">Perempuan</label>
                        <input type="radio" name="sex" id="sex3" value="Other" />
                        <label htmlFor="sex3">Other</label>
                    </div>
                </li>
                <li>
                    <label htmlFor="interest">Hobi</label>
                    <div className="option">
                        <input type="checkbox" name="interest" id="interest1" value="Ngoding" onChange={boxChecked} />
                        <label htmlFor="interest1">Ngoding</label>
                        <input type="checkbox" name="interest" id="interest2" value="Rebahan" onChange={boxChecked} />
                        <label htmlFor="interest2">Rebahan</label>
                        <input type="checkbox" name="interest" id="interest3" value="Melamun" onChange={boxChecked} />
                        <label htmlFor="interest3">Melamun</label>
                        <input type="checkbox" name="interest" id="interest4" value="Baca Buku" onChange={boxChecked} />
                        <label htmlFor="interest4">Baca Buku</label>
                        <input type="checkbox" name="interest" id="interest5" value="Nonton Youtube" onChange={boxChecked} />
                        <label htmlFor="interest5">Nonton Youtube</label>
                        <input type="checkbox" name="interest" id="interest6" value="Dengerin Lagu" onChange={boxChecked} />
                        <label htmlFor="interest6">Dengerin Lagu</label>
                        <input type="checkbox" name="interest" id="interest7" value="Other" onChange={boxChecked} />
                        <label htmlFor="interest7">Other</label>
                    </div>
                </li>
                <li>
                    <label htmlFor="religion">Agama</label>
                    <input type="text" name="religion" id="religion" />
                </li>
                <li>
                    <label htmlFor="message">Pesan</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </li>
                <button type="submit">Submit</button>
            </form>
        </Fragment>
    )
}