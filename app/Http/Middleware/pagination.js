const pagination = (defaultLimit = 25) => {
  return (req, res, next) => {
    const page = Math.max(1, parseInt(req.query.page) || 1);
    const limit = Math.min(100, Math.max(1, parseInt(req.query.limit) || defaultLimit)); // Ограничиваем максимум 100 записей
    const skip = (page - 1) * limit;

    req.pagination = { page, limit, skip };
    next();
  };
};

module.exports = pagination;