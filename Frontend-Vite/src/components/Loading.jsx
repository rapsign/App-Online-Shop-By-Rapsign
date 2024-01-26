import { ClipLoader } from 'react-spinners';

const Loading = () => {
    return (
        <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'center', height: '50vh' }}>
        <ClipLoader color="#3f51b5" loading={true} size={50} />
      </div>
      );
};

export default Loading;