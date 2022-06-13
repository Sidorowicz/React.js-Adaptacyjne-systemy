import React from "react";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import Modal from "@mui/material/Modal";
import FormControl from "@mui/material/FormControl";
import Select from "@mui/material/Select";
import InputLabel from "@mui/material/InputLabel";
import MenuItem from "@mui/material/MenuItem";
import { Button } from "@mui/material";

const style = {
  position: "absolute",
  top: "50%",
  left: "50%",
  transform: "translate(-50%, -50%)",
  minWidth: 365,
  bgcolor: "background.paper",
  border: "1px solid #000",
  boxShadow: 24,
  p: 4,
};

function ModalTypeChoose({ open, handleClose, type, id }) {
  const [typ, setTyp] = React.useState(type);
  const handleChange = (event) => {
    setTyp(event.target.value);
  };
  const text = { typ, id };

  const handleSubmit = () => {
    fetch("http://localhost/api/typeUpdate.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(text),
    }).then(() => {
      console.log("add : " + JSON.stringify(text));
    });
  };

  return (
    <div>
      <Modal
        open={open}
        onClose={handleClose}
        aria-labelledby="modal-modal-title"
        aria-describedby="modal-modal-description"
      >
        <Box sx={style}>
          <h2 className="text-center">Ustawienia</h2>
          <Typography id="modal-modal-title" variant="h6" component="h2">
            <p className="text-center">Zmień ustwienia osobowości</p>
            <FormControl sx={{ m: 1, minWidth: 300 }} size="small">
              <InputLabel id="demo-select-small">Typ osobowości</InputLabel>
              <Select
                labelId="demo-select-small"
                id="demo-select-small"
                value={typ}
                label="Typ osobowosci"
                onChange={handleChange}
              >
                <MenuItem value={1}>Wzrokowiec</MenuItem>
                <MenuItem value={2}>Słuchowiec</MenuItem>
                <MenuItem value={3}>Zadaniowiec</MenuItem>
                <MenuItem value={4}>Kinestetyk</MenuItem>
              </Select>
            </FormControl>
          </Typography>

          <Typography id="modal-modal-description" sx={{ mt: 2 }}></Typography>
          <div className="d-flex justify-content-center ">
            <Button variant="outlined" onClick={handleSubmit}>
              Zapisz
            </Button>
          </div>
        </Box>
      </Modal>
    </div>
  );
}

export default ModalTypeChoose;
