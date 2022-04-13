import { Fragment } from "react";

export default function result(props)
{
    return(
        <Fragment>
            <div id="result">
                <div>
                    <p className="const">Label</p>
                    <p className="const">Value</p>
                </div>
                <div>
                    <p className="const">Nama</p>
                    <p className="change text">{props.data.name}</p>
                </div>
                <div>
                    <p className="const">Tanggal Lahir</p>
                    <p className="change text">{props.data.born}</p>
                </div>
                <div>
                    <p className="const">Jenis Kelamin</p>
                    <p className="change text">{props.data.sex}</p>
                </div>
                <div>
                    <p className="const">Hobi</p>
                    <p className="change">{props.data.hobby}</p>
                </div>
                <div>
                    <p className="const">Agama</p>
                    <p className="change text">{props.data.religion}</p>
                </div>
                <div>
                    <p className="const">Pesan</p>
                    <p className="change text">{props.data.message}</p>
                </div>
            </div>
        </Fragment>
    )
}